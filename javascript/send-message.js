/**
 * instantKOM API Example: Send Message
 *
 * Sends a 1:1 text message to a recipient by their internal ID.
 * To find the recipient ID, use the contacts endpoint:
 *   GET /v1/contacts?search=<phone_or_name>
 */

require('dotenv').config();
const axios = require('axios');

const API_KEY = process.env.API_KEY;
const BASE_URL = process.env.BASE_URL || 'https://api.instantkom.app';

async function sendMessage() {
  try {
    const response = await axios.post(
      `${BASE_URL}/v1/messages`,
      {
        recipientId: 12345, // Internal instantKOM contact ID (not a phone number)
        message: 'Hello from instantKOM API!',
        messageType: 'text',
      },
      {
        headers: {
          'Authorization': `Bearer ${API_KEY}`,
          'Content-Type': 'application/json',
        },
      }
    );

    console.log('Message sent successfully!');
    console.log('Message ID:', response.data.id);
    console.log(response.data);
  } catch (error) {
    if (error.response) {
      console.error('Error sending message:', error.response.status);
      console.error(error.response.data);
    } else {
      console.error('Error:', error.message);
    }
  }
}

// Run the example
sendMessage();
