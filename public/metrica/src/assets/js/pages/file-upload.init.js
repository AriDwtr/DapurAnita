/**
 * Theme: Metrica - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Dropzone Js
 */
const handleChange = function() {
  const fileUploader = document.querySelector('#input-file');
      const getFile = fileUploader.files
      if (getFile.length !== 0) {
          const uploadedFile = getFile[0];
          readFile(uploadedFile);
      }
  }
  const readFile = function (uploadedFile) {
      if (uploadedFile) {
          const reader = new FileReader();
          reader.onload = function () {
          const parent = document.querySelector('.preview-box');
          parent.innerHTML = `<img class="preview-content" src=${reader.result} />`;
          };
          
          reader.readAsDataURL(uploadedFile);
      }
  };



var uppy = new Uppy.Uppy()
  uppy.use(Uppy.DragDrop, { target: '#drag-drop-area' })
  uppy.use(Uppy.Tus, { endpoint: 'https://google.com' })


