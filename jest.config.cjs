// /** @type {import('jest').Config} */
// const config = {
//   verbose: true,
// };

// module.exports = config;


// jest.config.cjs
const { defaults } = require('jest-config');

module.exports = {
  // ... Autres configurations ...
  moduleNameMapper: {
    '^@/(.*)$': '<rootDir>/resources/js/$1',
  },
  moduleFileExtensions: [...defaults.moduleFileExtensions, 'vue'], // Ajouter 'vue' à la liste des extensions
  transform: {
    '^.+\\.jsx?$': 'babel-jest',
    '^.+\\.vue$': 'vue-jest',
  },
  // ... Autres configurations ...
  transformIgnorePatterns: ['/node_modules/(?!@babel)'], // Ignorer la transformation de node_modules, sauf pour le dossier @babel
};
