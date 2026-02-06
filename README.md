# Portfolio Alan Ledesma - Sistema Automático de Imágenes

## 📁 Estructura de Carpetas

```
tu-sitio/
│
├── index.html              ← Página principal
├── scan-images.php         ← Script para escanear imágenes
├── portfolio-data.json     ← Generado automáticamente
│
└── images/
    ├── render/
    │   ├── guerrero_1.png
    │   ├── guerrero_2.jpg
    │   ├── espada_1.png
    │   └── espada_2.jpg
    │
    ├── print/
    │   ├── dragon_1.jpg
    │   ├── dragon_2.png
    │   └── mago_1.jpg
    │
    └── game/
        ├── ciudad_1.png
        ├── ciudad_2.jpg
        └── personaje_1.png
```

## 🚀 Cómo Usar

### Paso 1: Subir archivos a tu servidor
1. Sube `index.html` y `scan-images.php` a la raíz de tu sitio web
2. Crea la carpeta `images/` con las subcarpetas: `render/`, `print/`, `game/`

### Paso 2: Nombrar tus imágenes
Usa este formato: `nombreProyecto_numeroImagen.extension`

**Ejemplos válidos:**
- `guerrero_1.png`
- `guerrero_2.jpg`
- `espada_medieval_1.png`
- `espada_medieval_2.jpg`
- `dragon_volador_1.png`

**❌ Ejemplos NO válidos:**
- `imagen1.png` (falta el guión bajo)
- `proyecto-1.png` (usa guión en lugar de guión bajo)
- `foto.jpg` (falta el número)

### Paso 3: Generar el archivo de datos
1. Abre tu navegador
2. Ve a: `http://tudominio.com/scan-images.php`
3. Verás el JSON generado
4. El archivo `portfolio-data.json` se creará automáticamente

### Paso 4: ¡Listo!
Abre `http://tudominio.com/index.html` y verás tu portfolio funcionando.

## 🔄 Actualizar con nuevas imágenes

Cada vez que agregues nuevas imágenes:

1. Sube las imágenes a la carpeta correspondiente (`render/`, `print/`, o `game/`)
2. Asegúrate de usar el formato correcto: `nombreProyecto_numero.extension`
3. Ejecuta nuevamente: `http://tudominio.com/scan-images.php`
4. Recarga tu portfolio - ¡las nuevas imágenes aparecerán automáticamente!

## 📝 Notas Importantes

### Extensiones soportadas
- `.png`
- `.jpg`
- `.jpeg`

### Nombre del proyecto
El nombre antes del guión bajo se convierte en el nombre del proyecto:
- `guerrero_1.png` → Proyecto: "Guerrero"
- `espada_medieval_1.jpg` → Proyecto: "Espada Medieval"
- `dragon_volador_1.png` → Proyecto: "Dragon Volador"

### Orden de las imágenes
Las imágenes se ordenan automáticamente por el número:
- `proyecto_1.png` (primera imagen)
- `proyecto_2.png` (segunda imagen)
- `proyecto_3.png` (tercera imagen)

## 🛠️ Personalización

### Cambiar categorías
Edita en `scan-images.php` línea 18:
```php
$categories = ['render', 'print', 'game'];
```

Agrega o quita categorías según necesites.

### Cambiar nombres de categorías en la web
Edita en `index.html` línea 428:
```javascript
const categoryNames = {
  render: 'Render',
  print: 'Print',
  game: 'Game'
};
```

### Cambiar carpeta de imágenes
Si quieres usar otra carpeta que no sea `images/`:

1. En `scan-images.php` línea 19:
```php
$imageFolder = 'tus-imagenes';
```

2. En `index.html` línea 422:
```javascript
const IMAGE_FOLDER = 'tus-imagenes';
```

## ⚠️ Solución de Problemas

### No aparecen las imágenes
1. Verifica que ejecutaste `scan-images.php`
2. Revisa que `portfolio-data.json` existe
3. Confirma que los nombres de archivo siguen el formato: `nombre_numero.extension`

### Las categorías no aparecen
1. Verifica que las carpetas existen: `images/render/`, `images/print/`, `images/game/`
2. Confirma que hay al menos una imagen válida en cada carpeta

### Error al cargar JSON
1. Verifica permisos de escritura en la carpeta del sitio
2. Asegúrate de que PHP esté habilitado en tu servidor

## 📱 Características

✅ **100% Automático** - Solo agrega imágenes y ejecuta el script
✅ **Responsive** - Se adapta a celulares y tablets
✅ **Galería con Lightbox** - Visualización completa de imágenes
✅ **Filtros por categoría** - Render, Print, Game
✅ **Navegación con teclado** - Flechas para navegar, ESC para cerrar
✅ **Soporta PNG y JPG** - Cualquier formato de imagen común

## 🎨 Personalizar Colores

En `index.html` líneas 9-18, cambia las variables CSS:
```css
:root{
  --bg:#f7f7f7;        /* Color de fondo */
  --card:#ffffff;      /* Color de tarjetas */
  --text:#222;         /* Color de texto */
  --green:#1dbf73;     /* Color principal (botones) */
  /* ... más colores ... */
}
```

## 📞 Soporte

Si tienes problemas, revisa:
1. Consola del navegador (F12) para errores JavaScript
2. Logs del servidor para errores PHP
3. Permisos de carpetas y archivos

---

**¡Disfruta tu portfolio automático! 🚀**
