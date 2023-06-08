Vue.createApp({
    // data 函式 -> 資料邏輯
    data() {
        return {
            rgb: {
                r: 0,
                g: 0,
                b: 0
            },
            hex: '',
            type: '',
            value: '',
            warning: ''
        }
    },
    methods: {
        hexToRgb(hex) {
            if(hex.length == 3){
                [r, g, b] = Array(3).fill(hex.slice(0, 1) * 17);
            }else{
                r = parseInt(hex.slice(0, 2), 16);
                g = parseInt(hex.slice(2, 4), 16);
                b = parseInt(hex.slice(4, 6), 16);
            }
            return { r, g, b };
        },
        RgbTohex(r, g, b) {
            const rgb = [r, g, b];
            let hex = rgb.map(c => c.toString(16).padStart(2, '0')).join('');
            return hex
        }
    },
    computed: {
        color() {
            return {
                backgroundColor: this.value
            }
        }
    },
    watch: {
        value(newVal) {
            const hexRegex = /^#?([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/;
            const rgbRegex = /^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/;

            if (hexRegex.test(newVal)) {
                this.type = 'HEX';
                this.hex = newVal.replace("#", "");
                this.rgb = this.hexToRgb(this.hex);
                this.warning = '';
            } else if (rgbRegex.test(newVal)) {
                this.type = 'RGB';
                const match = newVal.match(rgbRegex);
                const r = parseInt(match[1]);
                const g = parseInt(match[2]);
                const b = parseInt(match[3]);
                this.hex = this.RgbTohex(r, g, b)
                if (r >= 0 && r <= 255 && g >= 0 && g <= 255 && b >= 0 && b <= 255) {
                    this.rgb = { r, g, b };
                    this.warning = '';
                } else {
                    this.warning = "Error";
                }
            } else {
                this.warning = "Error";
            }
        }
    }
}).mount('#app');
