Vue.createApp({
    data(){
        return{
            color: false,
            styleObject:{
                backgroundColor: '#fff',
                color: '#000'
            },
            mode: 'light Mode Test',
            btnMode: '夜間模式'
        }
    },
    methods: {
        switchEvent(){
            this.color = !this.color
            this.mode = this.color ? 'Night Mode Test' : 'light Mode Test';
            this.btnMode = this.color ? '輕亮模式' : '夜間模式';
            this.styleObject.backgroundColor = this.color ? 'black' : '#ffffff';
            this.styleObject.color = this.color ? '#ffffff' : 'black';
        }
    }
}).mount('#app')