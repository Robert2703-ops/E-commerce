<template>
    <div class="home-content">
        <div class="messages">
            <div class="card message-cart">
                <div>
                    <h2>kdejghkljdfajghfdjknbfdjnbknjmfndkbjmn
                    fdknbfjdnbfnbçdjfnbjkfn
                    dblkfndklnfhlnlkndf</h2>
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
                products: []
            }
        },
        async created() {
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

            // console.log(this.products)
            // console.log(response)
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

    margin-bottom: 14%;
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
    justify-content: space-between;
}

.product {
    width: 20%;
    height: 180px;

    margin: 10px;

    border: 2px solid red;
}

/* responsive layout */
@media only screen and ( max-width: 530px ) {

}

</style>