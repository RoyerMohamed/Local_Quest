import Login from '../../resources/js/components/auth/Login.vue';

describe('login.cy.jsx', () => {

  it('Composant Login: test d’affichage du titre', () => {
    cy.mount(Login)
    cy.contains('Connexion')
  })

  it('Composant login: test de remplissage du formulaire', () => {
    cy.mount(Login)
    cy.get('input[name=local_user_name]').type("admin", { force: true })
      .should("have.value", "admin")
    cy.get('input[name=login_password]').type("Password", { force: true })
      .should("have.value", "Password")
  })
  it('Composant Login: test de validation du formulaire', () => {
    cy.mount(Login)
    cy.get('input[name=local_user_name]').type("admin", { force: true })
      .should("have.value", "admin")
    cy.get('input[name=login_password]').type("Password", { force: true })
      .should("have.value", "Password")
    cy.get('button.btn_signUp').contains('Se connecter').click()
    cy.url().should('include', '/')
  })

})