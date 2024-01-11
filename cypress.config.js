import { defineConfig } from 'cypress';
import mysql from 'mysql2/promise';

async function queryTestDb(query, config) {
  // creates a new mysql connection using credentials from cypress.json env's
  const connection = await mysql.createConnection(config.env.db);

  try {
    // start connection to db
    await connection.connect();

    // exec query + disconnect to db as a Promise
    const [results] = await connection.query(query);
    return results;
  } catch (error) {
    throw error;
  } finally {
    // Close the connection in the 'finally' block to ensure it always happens
    await connection.end();
  }
}

const config = defineConfig({
  e2e: {
    baseUrl: 'http://localhost:8000',
    setupNodeEvents(on, config) {
      on('task', { queryDb: query => queryTestDb(query, config) });
    },
    supportFile: false
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
    setupNodeEvents(on, config) {
      on('task', { queryDb: query => queryTestDb(query, config) });
    },
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