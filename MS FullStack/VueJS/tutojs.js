new Vue({
    el: "#app",
    data:{
        message: "Salut les gens",
        link: "http://google.com",
        success: true,
        persons: ["Jean","Pierre","Paul","Marie","Adrien"],
    },
    methods:{
        close: function(){
            this.success = false
        },
        style: function(){
            if (this.success){
                return {background: 'aqua'}
            } else {
                return{background: 'orange'}
            }
        }
    }
})