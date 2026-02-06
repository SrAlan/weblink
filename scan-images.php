<?php
/**
 * Script para escanear automáticamente las carpetas de imágenes
 * y generar el archivo portfolio-data.json
 * 
 * INSTRUCCIONES:
 * 1. Sube este archivo (scan-images.php) a la raíz de tu sitio web
 * 2. Accede a: http://tudominio.com/scan-images.php
 * 3. El archivo portfolio-data.json se creará/actualizará automáticamente
 * 4. ¡Listo! Tu portfolio se actualizará solo
 */

header('Content-Type: application/json; charset=utf-8');

// Configuración
$categories = ['render', 'print', 'game'];
$imageFolder = 'images';
$outputFile = 'portfolio-data.json';

$portfolioData = [];

// Escanear cada categoría
foreach ($categories as $category) {
    $categoryPath = $imageFolder . '/' . $category;
    
    if (!is_dir($categoryPath)) {
        continue;
    }
    
    // Obtener todos los archivos de la carpeta
    $files = scandir($categoryPath);
    $images = [];
    
    foreach ($files as $file) {
        // Filtrar solo imágenes PNG, JPG, JPEG
        if (preg_match('/\.(png|jpg|jpeg)$/i', $file)) {
            $images[] = $file;
        }
    }
    
    // Organizar imágenes por proyecto
    $projects = [];
    
    foreach ($images as $filename) {
        // Extraer nombre del proyecto y número
        // Formato: nombreProyecto_numero.extension
        if (preg_match('/^(.+?)_(\d+)\.(png|jpg|jpeg)$/i', $filename, $matches)) {
            $projectName = $matches[1];
            $imageNumber = (int)$matches[2];
            
            if (!isset($projects[$projectName])) {
                $projects[$projectName] = [];
            }
            
            $projects[$projectName][] = [
                'filename' => $filename,
                'number' => $imageNumber
            ];
        }
    }
    
    // Ordenar imágenes de cada proyecto por número
    foreach ($projects as $projectName => &$projectImages) {
        usort($projectImages, function($a, $b) {
            return $a['number'] - $b['number'];
        });
    }
    
    $portfolioData[$category] = $projects;
}

// Guardar archivo JSON
$jsonData = json_encode($portfolioData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents($outputFile, $jsonData);

// Mostrar resultado
echo $jsonData;

echo "\n\n<!-- Archivo generado exitosamente: $outputFile -->";
echo "\n<!-- Total de categorías: " . count($portfolioData) . " -->";

$totalProjects = 0;
foreach ($portfolioData as $category => $projects) {
    $totalProjects += count($projects);
}
echo "\n<!-- Total de proyectos: $totalProjects -->";

?>
