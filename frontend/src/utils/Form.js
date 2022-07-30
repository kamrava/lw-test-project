import Errors from './Errors'
import axios from 'axios'
import store from "../store"
import { Cookies } from 'quasar'

class Form {
  static get config() {
    return {
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      }
    }
  }
  /**
   * Create a new Form instance.
   *
   * @param {object} data
   * @param config
   */
  constructor(data = {}, config = null) {
    this.originalData = data
    for (let field in data) {
      this[field] = data[field]
    }
    this.config = config || Form.config
    this.errors = new Errors()
    this.base_url = process.env.API
  }

  /**
   * Fetch all relevant data for the form.
   */
  data() {
    let data = {}
    for (let property in this.originalData) {
      data[property] = this[property]
    }
    return data
  }

  /**
   * Reset the form fields.
   */
  reset() {
    for (let field in this.originalData) {
      this[field] = ''
    }

    this.errors.clear()
  }

  /**
   * Send a GET request to the given URL.
   * .
   * @param {string} url
   */

  get(url) {
    return this.submit('get', url);
  }

  /**
   * Send a POST request to the given URL.
   * .
   * @param {string} url
   * @param data
   */
  post(url, data) {
    return this.submit('post', url, data)
  }

  /**
   * Send a PUT request to the given URL.
   * .
   * @param {string} url
   */
  put(url) {
    return this.submit('put', url)
  }

  /**
   * Send a PATCH request to the given URL.
   * .
   * @param {string} url
   */
  patch(url) {
    return this.submit('patch', url)
  }

  /**
   * Send a DELETE request to the given URL.
   * .
   * @param {string} url
   */
  delete(url) {
    return this.submit('delete', url)
  }

  /**
   * Submit the form.
   *
   * @param {string} requestType
   * @param {string} url
   * @param {object} data
   * @param {object} config
   */
  submit(requestType, url, data = this.data(), config = this.config) {
    return new Promise((resolve, reject) => {
      const options = {
        url: url,
        data: data,
        method: requestType,
        baseURL: this.base_url
      }
      Object.assign(options, config);
      axios(options).then(response => {
        this.onSuccess(response.data)
        resolve(response.data)
      }).catch(error => {
        switch (error.response.status) {
          case 422:
            this.onFail(error.response.data.errors)
            break
        }
        reject(error.response)
      })
    })
  }

  /**
   * Handle a successful form submission.
   *
   * @param {object} data
   */
  onSuccess(data) {
    this.reset()
  }

  /**
   * Handle a failed form submission.
   *
   * @param {object} errors
   */
  onFail(errors) {
    this.errors.record(errors)
  }

}

export default Form
