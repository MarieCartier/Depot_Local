//en 1er déclaration du component
app.component('product-display', 
    {
        template: //déclaration de toute la partie html à afficher dans la balise déclarée avec le nom du component, ici product-display
        /*html*/
        `<div class="product-display">
            <div class="product-container">
                <div class="product-image">
                <img v-bind:src="image" alt="chaussettes" />
                </div>
                <div class="product-info">
                <h1>{{ product }}</h1>
                <p v-if="inStock">En stock</p>
                <p v-else>Rupture</p>
                <p>Détail:</p>
                <ul>
                    <li v-for="detail in details">{{detail}}</li>
                </ul>
                <p>Existe en:</p>
                <div 
                    v-for="(variant, index) in variants" 
                    :key="variant.id" 
                    @mouseover="updateVariant(index)" 
                    class="color-circle" 
                    :style="{ backgroundColor: variant.back }">
                </div>
                <button
                    class="button"
                    :class="{disabledButton: !inStock}"
                    :disabled="!inStock"
                    @click="addToCart"
                >
                    Ajouter au panier
                </button>
                <button
                    class="button"
                    :class="{disabledButton: !inStock}"
                    :disabled="!inStock"
                    @click="remFromCart"
                >
                    Enlever du panier
                </button>
                </div>
            </div>
        </div>`,

        data: {
            product: "Chaussette",
            selectedVariant: 0,
            details: ["50% coton", "30% laine", "20% polyester"],
            variants: [
                {
                    id: 1234,
                    color: "bleu",
                    back: "#38475F",
                    image: "./assets/images/socks_blue.jpg",
                    quantity: 50,
                },
                {
                    id: 3245,
                    color: "vert",
                    back: "#4F9869",
                    image: "./assets/images/socks_green.jpg",
                    quantity: 0,
                },
            ],
        },

        methods: {
            addToCart() {
                this.$emit("add-to-cart",this.variants[this.selectedVariant].id)
            },
            remFromCart() {
                this.$emit("rem-from-cart")
            },
            updateVariant(index) {
                this.selectedVariant = index;
            },
        },

        computed: {
            image() {
                return this.variants[this.selectedVariant].image;
            },
            inStock() {
                return this.variants[this.selectedVariant].quantity;
            },
            shipping() {
                if (this.premium) {
                return "Gratuit";
                }
                return "5 €";
            },
        },
    });
    