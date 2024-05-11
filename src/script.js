class Customer {
    constructor(name, email) {
      this.name = name;
      this.email = email;
    }
  
    makeReservation(date, time, partySize) {
      // Logic to make a reservation
      console.log(`${this.name} made a reservation for ${partySize} on ${date} at ${time}.`);
    }
  
    placeOrder(tableNumber, items) {
      // Logic to place an order
      console.log(`Table ${tableNumber} (${this.name}) placed an order for ${items.join(', ')}.`);
    }
  }
  
  class Order {
    constructor(customer) {
      this.customer = customer;
      this.items = [];
    }
  
    addItem(item) {
      this.items.push(item);
      this.renderOrder();
    }
  
    removeItem(item) {
      this.items = this.items.filter(i => i !== item);
      this.renderOrder();
    }
  
    renderOrder() {
      const orderList = document.getElementById('orderList');
      orderList.innerHTML = '';
      this.items.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item;
        orderList.appendChild(li);
      });
    }
  }
  
  document.addEventListener('DOMContentLoaded', () => {
    const reservationForm = document.getElementById('reservationForm');
    const orderForm = document.getElementById('orderForm');
    const placeOrderBtn = document.getElementById('placeOrderBtn');
  
    reservationForm.addEventListener('submit', event => {
      event.preventDefault();
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const date = document.getElementById('date').value;
      const time = document.getElementById('time').value;
      const partySize = parseInt(document.getElementById('partySize').value);
  
      const customer = new Customer(name, email);
      customer.makeReservation(date, time, partySize);
      // Clear the form fields after submission
      reservationForm.reset();
    });
  
    const customer = new Customer('Alice', 'alice@example.com');
    const order = new Order(customer);
  
    orderForm.addEventListener('submit', event => {
      event.preventDefault();
      const tableNumber = document.getElementById('tableName').value;
      const customerName = document.getElementById('customerName').value;
      const item = document.getElementById('orderItem').value;
      order.addItem(item);
      // Clear the item field after adding
      document.getElementById('orderItem').value = '';
    });
  
    placeOrderBtn.addEventListener('click', () => {
      const tableNumber = document.getElementById('tableName').value;
      const customerName = document.getElementById('customerName').value;
      customer.name = customerName;
      customer.placeOrder(tableNumber, order.items);
      order.items = []; // Clear the order items after placing order
      order.renderOrder();
    });
  });
  