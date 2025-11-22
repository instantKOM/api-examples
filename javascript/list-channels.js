/**
 * instantKOM API Example: List Channels
 *
 * This example demonstrates how to retrieve all your messaging channels.
 */

require('dotenv').config();
const axios = require('axios');

const API_KEY = process.env.API_KEY;
const BASE_URL = process.env.BASE_URL || 'https://api.instantkom.app';

async function listChannels(page = 1, limit = 10) {
  try {
    const response = await axios.get(
      `${BASE_URL}/v1/channels`,
      {
        params: { page, limit },
        headers: {
          'Authorization': `Bearer ${API_KEY}`,
        },
      }
    );

    console.log(`Channels (Page ${page}):`);
    console.log('='.repeat(50));

    response.data.data.forEach(channel => {
      console.log(`ID: ${channel.id}`);
      console.log(`Name: ${channel.name}`);
      console.log(`Type: ${channel.type}`);
      console.log(`Status: ${channel.status ? 'Active' : 'Inactive'}`);
      console.log('-'.repeat(50));
    });

    // Pagination info
    if (response.data.meta) {
      console.log(`\nTotal: ${response.data.meta.total}`);
      console.log(`Pages: ${response.data.meta.totalPages}`);
    }
  } catch (error) {
    if (error.response) {
      console.error('Error retrieving channels:', error.response.status);
      console.error(error.response.data);
    } else {
      console.error('Error:', error.message);
    }
  }
}

// Run the example
listChannels();
