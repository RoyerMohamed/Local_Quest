describe('add and edit shop', () => {

    it('add a shop', () => {
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
        cy.get('input[name=user_name]').type("testUser", { force: true })
            .should("have.value", "testUser")

        cy.get('input[name=password]').type("Seemeecome971@", { force: true })
            .should("have.value", "Seemeecome971@")

        cy.get('input[type=submit]').click()
        cy.url().should('include', '/')
        
        cy.wait(3000)
        cy.contains('Ajouter un commerce ').click()
        
        cy.get('input[name=shop_title]').type("testShop", { force: true })
        .should("have.value", "testShop")
        cy.get('input[name=adresse]').type("5 citée la voie férré", { force: true })
        .should("have.value", "5 citée la voie férré")
        cy.get('input[name=zipCode]').type("97139", { force: true })
        .should("have.value", "97139")
        cy.get('input[name=city]').type("raizet ", { force: true })
        .should("have.value", "raizet ")
        cy.get('select[name=department]').select(1, { force: true })
        .should("have.value", 1)
        cy.get('select[name=categories]').select(1, { force: true })
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
        cy.url().should('include', '/commerces')
        
    })

    it('Delete the created user', function () {
        cy.task('queryDb', 'DELETE FROM users ORDER BY id DESC LIMIT 1', { log: false })
            .then(result => {
                // Log the result for debugging purposes
                cy.log('Query Result:', result);

                // Perform assertions using Cypress commands
                cy.wrap(result.affectedRows).should('be.greaterThan', 0);
            });
    });

})
