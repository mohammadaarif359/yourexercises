document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const imageLabel = imageInput.nextElementSibling;
    imageInput.addEventListener('change', function() {
        const fileNames = Array.from(imageInput.files)
            .map(file => file.name)
            .join(', ');
            console.log('fileNames',fileNames)
        imageLabel.textContent = fileNames || 'Choose file';
    });
});