new Vue({
    el: '#app',
    data() {
        return {
            isChanged: false,
            image: '../svg/Like-black.png'
        }
    },
    methods: {
        changeColor() {
            // isChanged = !isChanged;
            this.image = '../svg/Like-orange.png';
        }
    },
});