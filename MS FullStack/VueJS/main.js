const app = Vue.createApp({
    //data permet de renseigner toutes les données à retourner dans le html
    data() {
        return {
            cart:0,
            product: 'Chaussette',
            image: './assets/images/socks_blue.jpg',
            inStock: true,
            details: ['50% coton', '30% laine', '20% polyester'],
            variants: [
                {id: 1234 , color: 'bleu', back: '#38475F', image: './assets/images/socks_blue.jpg'},
                {id: 3245 , color: 'vert', back: '#4F9869', image: './assets/images/socks_green.jpg'}
            ]
        }
    },
    //method permet d'ajouer le dynamisme, donc des fonctions
    methods: {
        //fonction pour bouton ajouter au panier
        addToCart() {
            this.cart += 1
        },

        //fonction pour bouton retirer du panier
        remFromCart() {
            if(this.cart > 0) {
                this.cart -= 1
            }
        
        //fonction qui change l'image selon le variant a laquelle elle est attachée    
        }, 
        changeImg(variantImage) {
            this.image = variantImage
        }
    }
})
