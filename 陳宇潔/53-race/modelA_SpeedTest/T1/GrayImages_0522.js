Vue.createApp({
    data() {
        return{
            img: []
        }
    },
    methods: {
        handleFileChange(event) {
            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const url = URL.createObjectURL(file);
                const image = new Image();

                image.onload = () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = image.width / 2;
                    canvas.height = image.height / 2;
                    ctx.filter = 'grayscale(1)';
                    ctx.drawImage(image, 0, 0, image.width / 2, image.height / 2);
                    const newImage = canvas.toDataURL();
                    this.img.push({
                        old: url,
                        new: newImage,
                    });
                    download(newImage, "result.png");
                };
                function download(base64Data, fileName) {
                        const link = document.createElement('a');
                        link.href = base64Data;
                        link.download = fileName;
                        link.click();
                }
                image.src = url;
            }
        }
    }
}).mount('#app')