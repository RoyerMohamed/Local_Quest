// Import du composant Profil
import Profil from '../../resources/js/components/user/Profil.vue'

// Import de la fonction useUserStore depuis userStore
import { useUserStore } from "../../resources/js/stores/userStore"

// Suite de tests pour le composant Profil
describe('verification de l interaction entre le composent et le store', () => {

  it('verification du token csrf', () => {
    // Obtient le jeton CSRF
    cy.request('http://localhost:8000/sanctum/csrf-cookie').as('csrfcookie')

    // Vérifie que la requête CSRF a réussi
    cy.get('@csrfcookie').should((response) => {
      expect(response.status).to.eq(204)
    })
  })

  // Test : Vérifie le rendu du composant
  it('connexion et montage composent', () => {
    // Effectue une connexion en tant qu'administrateur
    cy.request('POST', 'http://localhost:8000/api/login/',
      { user_name: 'admin', password: 'Password' })
      .then(
        (response) => {
          // Initialise le magasin d'utilisateurs
          const userStore = useUserStore();

          // Vérifie la réussite de la connexion
          expect(response.status).to.eq(200)

          // Vérifie certaines propriétés de l'utilisateur
          expect(response.body.user).to.have.property('user_name', 'admin')

          // Assigne l'utilisateur connecté à userStore
          userStore.setUser(response.body.user)

          // Montre le composant Profil
          cy.mount(Profil)

          // Vérifie le titre h1 du composant
          cy.get('h1').should('have.text', 'Profil')

          // Modifie la valeur de l'input email et vérifie la modification
          cy.get('input[type=email]')
            .clear()
            .type('test@test.fr')
            .should('have.value', 'test@test.fr')

          // Clique sur le bouton de soumission du formulaire
          cy.get('input[type=submit]').click()

          // Vérifie si la valeur de l'email a été mise à jour dans le magasin d'utilisateurs
          expect(userStore.$state.email).to.equal("test@test.fr")
        }
      )
  })
})