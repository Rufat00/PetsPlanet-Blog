const previewImage = (e) => {

    const reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);

    reader.onloadend = () => {
        document.querySelector('#preview').src = reader.result
    };
};

document.querySelector('#image').addEventListener('change', previewImage)


const copyLink = (e) => {
    navigator.clipboard.writeText( e.currentTarget.dataset.link )
}

document.getElementsByName('link').forEach(linkButton => {
    linkButton.addEventListener('click', copyLink)
})
