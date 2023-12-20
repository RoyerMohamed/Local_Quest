describe('add and edit shop', () => {


    it('add a shop', () => {
        cy.visit('http://localhost:8000')
        cy.contains('connexion').click()
        cy.get('input[name=user_name]').type("admin", { force: true })
            .should("have.value", "admin")
        cy.get('input[name=password]').type("Password", { force: true })
            .should("have.value", "Password")
        cy.get('input[type=submit]').click()
        cy.url().should('include', '/')
        cy.wait(3000)
      
        cy.contains('Ajouter un commerce').click()

        cy.get('input[name=shop_title]').type("testShop", { force: true })
            .should("have.value", "testShop")

        cy.get('input[name=adresse]').type("68 bis rue elise lucas", { force: true })
            .should("have.value", "68 bis rue elise lucas")

        cy.get('input[name=zipCode]').type("79510", { force: true })
            .should("have.value", "79510")

        cy.get('input[name=city]').type("coulon", { force: true })
            .should("have.value", "coulon")

        cy.get('select[name=department]').select(0, { force: true })
            .should("have.value", 1)

        cy.get('select[name=categories]').select(0, { force: true })
            .should("have.value", 1)

        cy.get('[type=checkbox]').check({ force: true })
            .should('be.checked')

        cy.get('textarea').type("je suis un shop test", { force: true })
            .should("have.value", "je suis un shop test")

        cy.get('input[type=url]').type("http://www.test.fr", { force: true })
            .should("have.value", "http://www.test.fr")

        cy.get('input[name=phoneNumber]').type("0616198911", { force: true })
            .should("have.value", "0616198911")

        cy.get('input[type=submit]').click()
        cy.wait(3000)
        cy.url().should('include', '/commerces')

    })
    it('Delete the created shop', function () {
        cy.task('queryDb', 'DELETE FROM shop ORDER BY id DESC LIMIT 1', { log: false })
          .then(result => {
            // Log the result for debugging purposes
            cy.log('Query Result:', result);
            
            // Perform assertions using Cypress commands
            cy.wrap(result.affectedRows).should('be.greaterThan', 0);
          });
      });
})
