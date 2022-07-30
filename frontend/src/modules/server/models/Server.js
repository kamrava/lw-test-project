import Form from 'src/utils/Form.js'

class Server extends Form {
  constructor(data, config = null) {
    super(data, config || Form.config)
  }

  static all(parameters, then) {
    return new Form().get('servers' + '?' + parameters).then(then)
  }

  static list(parameters, then) {
    return new Form().get('servers').then(then)
  }

  create(then) {
    return super.post('servers').then(then)
  }

  update(then) {
    return super.patch('servers/' + this.id).then(then)
  }

  destroy(then) {
    return super.delete('servers/' + this.id).then(then)
  }
}

export default Server
