new Vue({
    el: '#app',
    data() {
        return {
            isChanged: false,
            image: '../svg/Like-black.png'
        };
    },
    methods: {
        changeColor() {
            if(this.isChanged === false){
                this.image = '../svg/Like-orange.png';
                this.isChanged = !this.isChanged;
            }else{
                this.image = '../svg/Like-black.png';
                this.isChanged = !this.isChanged;
            }
        }
    }
});