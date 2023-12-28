
const Shop = import ('../../resources/js/components/commerces/Shop.vue')
//const ShopList = import ('../../resources/js/components/commerces/ShopList.vue') 
describe('My Vue Test', () => {
  it('should mount the Vue component', () => {
    // Import your Vue component

    // Use the custom cy.mount() command
    cy.mount(Shop);


    // Your test logic here
  });
});