Vue.component('product', {
	props:{
		premium:{
			type: Boolean,
			required: true
		}
	},
	template: `
    <div class="product">
      <div class="product-image">
        <img v-bind:src="image" />
      </div>
      <div class="product-info">
        <h1>{{ title }}</h1>
        <p v-if="inStock">In stock</p>
        <p v-else :class="{outSfStock: !inStock}">Out of stock</p>
        <ul>
          <li v-for="detail in details">{{ detail }}</li>
        </ul>
        <p>Shipping Cost: {{ shippingPrice }}</p>
        <div
          v-for="(variant, index) in variants"
          :key="variant.variantId"
          class="color-box"
          v-bind:style="{backgroundColor: variant.variantColor}"
          @mouseover="updateProduct(index)"
        ></div>
        <button
          v-on:click="addToCart"
          :disabled="!inStock"
          :class="{disabledButton: !inStock}"
        >
          Add To Cart
        </button>
        <button v-on:click="removeFromCart">Remove Item</button>

        <p v-if="onSale">On Sale</p>

      </div>
    </div>
	`,
	data() {
		return {
			product: 'Socks',
			brand: 'Vue Mastery',
			selectedVariant: 0,
			details: ['80% cotton', '20% polyester', 'Gender-neutral'],
			variants: [
				{
					variantId: 2234,
					variantColor: 'green',
					variantImage: './assests/green-sock.jpg',
					variantInStock: true,
					onSale: true
				},
				{
					variantId: 2235,
					variantColor: 'blue',
					variantImage: './assests/blue-sock.jpeg',
					variantInStock: true,
					onSale: false
				}
			],
			cart: 0
		};
	},
	methods: {
		addToCart() {
			this.$emit('add-to-cart', this.variants[this.selectedVariant].variantId);
		},
		removeFromCart() {
			this.$emit('remove-from-cart',this.variants[this.selectedVariant].variantId);
		},
		updateProduct(index) {
			this.selectedVariant = index;
		}
	},
	computed: {
		title() {
			return `${this.brand}  ${this.product}`;
		},
		image() {
			return this.variants[this.selectedVariant].variantImage;
		},
		inStock() {
			return this.variants[this.selectedVariant].variantInStock;
		},
		onSale() {
			return this.variants[this.selectedVariant].onSale;
		},
		shippingPrice(){
			return this.premium ? 'free':2.99;
		}
	}
});
var app = new Vue({
	el: '#app',
	data:{
		premium: true,
		cart:[]
	},
	methods: {
		addToCart(id){
			this.cart.push(id)
		},
		removeFromCart(id){
			
			var index = this.cart.indexOf(id);
			if(index >-1){
				this.cart.splice(index,1)
			}
		}
	},
});
