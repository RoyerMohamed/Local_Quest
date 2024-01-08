import Login  from '../../resources/js/components/auth/login.vue'
import {createLocalVue, shallowMount, RouterLinkStub } from '@vue/test-utils'
const wrapper = shallowMount(Login,{
  global: {
    stubs: {
        'router-link': RouterLinkStub, // on inclut routerlinkStub pour éviter une erreur sur router-link
    }
}
})

const localVue = createLocalVue();

describe('Vérifications sur le composant Login.vue', () => {
  it('titre de la page affiché', () => {
    const wrapper = shallowMount(Login, { localVue });
    const title = wrapper.find('h1');
    expect(title.text()).toBe('Inscription');
  });
});


