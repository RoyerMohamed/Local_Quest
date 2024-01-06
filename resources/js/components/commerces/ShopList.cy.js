import ShopListe from ''
import { useShopStore } from "../../resources/js/stores/shopStore"

describe('<MonCompte />', () => {
  it('renders', () => {

    // connexion utilisateur : requête cookie CSRF 

    //cy.request('http://localhost:8000/sanctum/csrf-cookie').as('csrfcookie')

    // cy.get('@csrfcookie').should((response) => {
    //   expect(response.status).to.eq(204)
    // })

    // connexion utilisateur : login

    // cy.request('POST', 'http://localhost:8000/api/login/', 
    // { email: 'admin@gmail.com', password: 'Password' })
    // .then(
    //   (response) => {
    //     // response.body is automatically serialized into JSON
    //     expect(response.status).to.eq(200)
    //     expect(response.body[0]).to.have.property('email', 'admin@reseausocial.fr') 
    //   }
    // )

    // cy.mount(ShopListe)

    // const shopStore = useShopStore();

    // les tests h1 doivent être dans le même it que mount (sinon ils échouent)
    //cy.get('h1').should('have.text', 'Mon Compte')  // syntaxe 1
    // cy.get("h1").invoke("text").should("eq", "Mon Compte"); // syntaxe 2 

    // on tape l'email dans l'input + vérification qu'il contient bien la saisie
    // cy.get('input[name=email]')
    //   .type('test@test.fr')
    //   .should('have.value', 'test@test.fr')

    // vérification que le store aussi contient l'email saisi
    // expect(userStore.$state.email).to.equal("test@test.fr")
  })
})