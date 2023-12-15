describe('display Local Quest Home Page + sign up page', () => {

    it('sign up', () => {
        cy.visit('http://localhost:8000')

        cy.contains('Inscription').click()

        cy.get('input[name=pseudo]').type("testUser", { force: true })
        .should("have.value", "testUser")

        cy.get('input[name=email]').type("testUser@testUser.com", { force: true })
        .should("have.value", "testUser@testUser.com")

        cy.get('input[name=password]').type("Seemeecome971@", { force: true })
        .should("have.value", "Seemeecome971@")
        
        cy.get('input[type=submit]').click()
        cy.url().should('include', '/login')
        cy.wait(3000)


    })
    it('sign in', () => {
        cy.visit('http://localhost:8000')

        cy.contains(' connexion ').click()

        cy.get('input[name=user_name]').type("testUser", { force: true })
        .should("have.value", "testUser")

        cy.get('input[name=password]').type("Seemeecome971@", { force: true })
        .should("have.value", "Seemeecome971@")

        cy.get('input[type=submit]').click()
    })
    
    it('Delete the created user', function () {
        cy.task('queryDb', `DELETE FROM users ORDER BY id desc LIMIT 1`).then((result) => {
          expect(result.message).to.equal("")
        })
      })
  })
  