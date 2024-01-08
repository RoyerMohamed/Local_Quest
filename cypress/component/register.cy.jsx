import Login from '../../resources/js/components/auth/Login.vue';

describe('login.cy.jsx', () => {

  it('Composant resgister: test d’affichage du titre', () => {
    cy.mount(Login)
    cy.contains('Inscription').click()
  })
  
  it('Composant register: test de remplissage du formulaire', () => {
    cy.mount(Login)
    cy.contains('Inscription').click()
    cy.get('input[name=pseudo]').type("testUser", { force: true })
    .should("have.value", "testUser")

    cy.get('input[name=email]').type("testUser@testUser.com", { force: true })
    .should("have.value", "testUser@testUser.com")

    cy.get('input[name=password]').type("Seemeecome971@", { force: true })
    .should("have.value", "Seemeecome971@")
   
  })

  it('Composant register: test de validation du formulaire', () => {
    cy.mount(Login)
    cy.contains('Inscription').click()
    cy.get('input[name=pseudo]').type("testUser", { force: true })
    .should("have.value", "testUser")

    cy.get('input[name=email]').type("testUser@testUser.com", { force: true })
    .should("have.value", "testUser@testUser.com")

    cy.get('input[name=password]').type("Seemeecome971@", { force: true })
    .should("have.value", "Seemeecome971@")

    cy.get('button.btn_signUp').contains("S’inscrire").click()

    cy.url().should('include', '/')
    
    cy.task('queryDb', 'DELETE FROM users ORDER BY id DESC LIMIT 1', { log: false })
    .then(result => {
      // Log the result for debugging purposes
      cy.log('Query Result:', result);
      
      // Perform assertions using Cypress commands
      cy.wrap(result.affectedRows).should('be.greaterThan', 0);
    });
  })

})