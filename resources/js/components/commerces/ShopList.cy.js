import ShopList from './ShopList.vue'

describe('<ShopList />', () => {
  it('renders', () => {
    // see: https://on.cypress.io/mounting-vue
    cy.mount(ShopList)
  })
})