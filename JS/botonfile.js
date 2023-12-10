var logosArray = [];
var imagenesArray = [];

function createImagePreview(readerResult, arrayToModify) {
    let preview = document.createElement('div');
    preview.className = 'preview-item';

    let Image = document.createElement('img');
    Image.src = readerResult;
    Image.style.width = "100px";

    let removeButton = document.createElement('button');
    removeButton.textContent = '✖';
    removeButton.classList.add('remove-btn');
    removeButton.addEventListener('click', function() {
        const index = arrayToModify.indexOf(readerResult);
        if (index !== -1) {
            arrayToModify.splice(index, 1);
        }
        preview.remove();
    });

    preview.appendChild(Image);
    preview.appendChild(removeButton);

    return preview;
}

document.getElementById('btn_agregar').onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function() {
        let preview = document.getElementById('preview');
        logosArray.push(reader.result);
        let previewItem = createImagePreview(reader.result, logosArray);
        preview.appendChild(previewItem);
    }
}

document.getElementById('btn_agregar1').onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function() {
        let preview = document.getElementById('preview1');
        imagenesArray.push(reader.result);
        let previewItem = createImagePreview(reader.result, imagenesArray);
        preview.appendChild(previewItem);
    }
}
