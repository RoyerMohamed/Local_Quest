import { defineConfig } from 'cypress';
import mysql from 'mysql2/promise';

function queryTestDb(query, config) {
  const connection = mysql.createConnection(config.env.db);
  connection.connect();

  return new Promise((resolve, reject) => {
    connection.query(query, (error, results) => {
      if (error) reject(error);
      else {
        connection.end();
        resolve(results);
      }
    });
  });
}

const config = defineConfig({
  e2e: {
    baseUrl: 'http://localhost:8000',
    setupNodeEvents(on, config) {
      on('task', { queryDb: query => queryTestDb(query, config) });
    },
  },

  env: {
    db: {
      host: 'localhost',
      user: 'root',
      password: '',
      database: 'local_quest',
    },
  },

  component: {
    devServer: {
      framework: 'vue',
      bundler: 'vite', // Use Vite as the bundler
      viteOptions: {
        configFile: new URL('vite.config.js', import.meta.url).pathname,
      },
    },
  },
});

export default config;
