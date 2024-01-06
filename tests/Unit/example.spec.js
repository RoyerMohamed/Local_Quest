import Login  from '../../resources/js/components/auth/login.vue'
import { shallowMount, RouterLinkStub } from '@vue/test-utils'
const wrapper = shallowMount(Login,{
  global: {
    stubs: {
        'router-link': RouterLinkStub, // on inclut routerlinkStub pour éviter une erreur sur router-link
    }
}
})

describe('Vérifications sur le composant Shop.vue', () => {
  it('titre de la page affiché', () => {
    const title = wrapper.get('h1')
    expect(title.text()).toBe('Inscription')
})
})
