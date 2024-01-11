// Description générale du test : affichage de la page d'accueil locale de Local Quest et de la page d'inscription.

describe('Affichage de la page d\'accueil locale de Local Quest + page d\'inscription', () => {

    // Test d'inscription d'un nouvel utilisateur
    it('Inscription', () => {
        // Visiter l'URL de la page d'accueil
        cy.visit('http://localhost:8000')

        // Cliquer sur le lien "Inscription"
        cy.contains('Inscription').click()

        // Remplir le formulaire d'inscription avec des informations fictives
        cy.get('input[name=pseudo]').type("testUser", { force: true }).should("have.value", "testUser")
        cy.get('input[name=email]').type("testUser@testUser.com", { force: true }).should("have.value", "testUser@testUser.com")
        cy.get('input[name=password]').type("Seemeecome971@", { force: true }).should("have.value", "Seemeecome971@")
        
        // Cliquer sur le bouton de soumission du formulaire
        cy.get('button.btn_signUp').contains("S’inscrire").click()

        // Vérifier que l'URL inclut '/login' après l'inscription
        cy.url().should('include', '/login')

        // Attendre pendant 3 secondes (peut être ajusté selon les besoins)
        cy.wait(3000)
    })

    // Test de connexion d'un utilisateur existant
    it('Connexion', () => {
        // Visiter l'URL de la page d'accueil
        cy.visit('http://localhost:8000')

        // Cliquer sur le lien "Connexion"
        cy.contains('connexion').click()

        // Remplir le formulaire de connexion avec les informations de l'utilisateur créé précédemment
        cy.get('input[name=local_user_name]').type("testUser", { force: true }).should("have.value", "testUser")
        cy.get('input[name=login_password]').type("Seemeecome971@", { force: true }).should("have.value", "Seemeecome971@")

        // Cliquer sur le bouton de soumission du formulaire
        cy.get('button.btn_signUp').contains("Se connecter").click()

        // Vérifier que l'URL inclut '/' après la connexion
        cy.url().should('include', '/')
    })

    // Test de suppression de l'utilisateur créé
    it('Supprimer l\'utilisateur créé', function () {
        // Exécuter une requête SQL pour supprimer le dernier utilisateur créé dans la base de données
        cy.task('queryDb', 'DELETE FROM users ORDER BY id DESC LIMIT 1', { log: false })
          .then(result => {
            // Journaliser le résultat à des fins de débogage
            cy.log('Résultat de la requête :', result);
            
            // Effectuer des assertions en utilisant les commandes Cypress
            cy.wrap(result.affectedRows).should('be.greaterThan', 0);
          });
      });
})
