<template>
    <div class="home-content">
        <div class="messages">
            <div class="card message-cart">
                <div>
                    <h2>kdejghkljdfaj ghfdjknbfdj nbknjmfndkbjmn
                    fdknbfjdnb fnbçdjfnbjkfn
                    </h2>
                </div>

                <div class="cart">
                    <button type="button">Cart</button>
                </div>
            </div>
            <div class="card product-image">
                <img src="./rtx-3060.jpg">
            </div>
        </div>

        <div class="on-sale">
            <h2> On sale products </h2>
            <div class="on-sale-products">
                <div class="product" v-for="product in products" v-bind:key="product.id">
                    <p> Name: {{ product.name }}, Price: {{ product.price }}  </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Home',
        data() {
            return {
                products: [],
                width: {
                    mobile: false,
                    tablet: false,
                    desktop: true
                }
            }
        },
        async created() {
            this.ViewPort()

            const options = {
                method: 'GET',
                mode: 'cors',
                cache: 'default'
            }

            const requisition = await fetch ( "http://127.0.0.1:8000/api/products", options )  
            const response = await requisition.json()

            if (response.status) {
                this.products = response.products
            }
        },
        methods: {
            ViewPort() {
                console.log("ok ok ok")
                const width = window.screen.width

                if ( width <= 530 ) {
                    this.width.mobile = true
                    this.width.tablet = false
                    this.width.desktop = false
                }

                else if ( width >= 540 && width <= 1024 ){
                    this.width.mobile = false
                    this.width.tablet = true
                    this.width.desktop = false
                }

                else {
                    this.width.mobile = false
                    this.width.tablet = false
                    this.width.desktop = true
                }    
            },
        }
        
     }
</script>

<style>

.home-content {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.messages {
    width: 80%;

    margin-bottom: 11%;
    margin-top: 5%;

    display: flex;
    justify-content: space-evenly;
}

.card {
    width: 40%;
    
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.card.product-image {
    justify-content: center;
}

.card.product-image img {
    width: 100%;
}

.cart {
    width: 35%;
    height: 20%;
}

.cart button {
    width: 100%;
    height: 100%;

    cursor: pointer;

    transition: 0.10s;
}

.on-sale {
    width: 100%;
    height: auto;

    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.on-sale-products {
    width: 95%;
    height: auto;
    
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.product {
    width: 20%;
    height: 180px;

        margin-top: 10px;
        margin-bottom: 10px;

    border: 2px solid red;
}

/* responsive layout */
@media only screen and ( max-width: 530px ) {
    .home-content .messages {
        flex-direction: column;
    }

    .home-content .messages .card {
        width: 100%;
        
        margin-bottom: 5px;

        justify-content: center;
    }

    .card.message-cart h2 {
        text-align: center;
    }

    .on-sale-products .product {
        width: 40%;

        margin-top: 5px;
        margin-bottom: 5px;
       /* margin: 10px 5px; */
    }
}

</style>