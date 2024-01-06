import { mount } from 'cypress/vue'
import { createPinia, setActivePinia } from "pinia";
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'

let pinia

// Run this code before each *test*.
beforeEach(() => {
    // New Pinia
    pinia = createPinia();
    pinia.use(piniaPluginPersistedstate)
    // Set current Pinia instance
    setActivePinia(pinia);
});


Cypress.Commands.add("mount", (component) => {
    return mount(component, {
        global: {
            plugins: [pinia],
        },
    });
});