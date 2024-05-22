document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_menu.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error fetching menu items:', data.error);
                return;
            }

            const menuItemsContainer = document.getElementById('menu-items');
            data.forEach(item => {
                const listItem = document.createElement('li');
                listItem.setAttribute('data-item-id', item.id);
                listItem.innerHTML = `${item.menuName} - $${item.price} <button onclick="addToOrder(${item.menuId}, '${item.menuName}', ${item.price})">Add to Order</button>`;
                menuItemsContainer.appendChild(listItem);
            });
        })
        .catch(error => console.error('Error fetching menu items:', error));
});

function addToOrder(id, name, price) {
    const orderItemsContainer = document.getElementById('order-items');
    let orderItem = document.querySelector(`#order-items li[data-item-id='${id}']`);

    if (orderItem) {
        const quantityInput = orderItem.querySelector('input');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    } else {
        orderItem = document.createElement('li');
        orderItem.setAttribute('data-item-id', id);
        orderItem.setAttribute('data-item-menuName', name);
        orderItem.innerHTML = `${name} - $${price.toFixed(2)} <input type="number" min="1" value="1" data-item-id="${id}">`;
        orderItemsContainer.appendChild(orderItem);
    }
}

function submitOrder() {
    const orderItems = document.querySelectorAll('#order-items li');
    const order = [];

    orderItems.forEach(item => {
        const id = item.getAttribute('data-item-id');
        const menuName = item.getAttribute('data-item-menuName')
        const quantity = item.querySelector('input').value;
        order.push({ id, menuName, quantity });
    });

    // localStorage.setItem('order', JSON.stringify(order));

    let orders = JSON.parse(localStorage.getItem('orders')) || [];

    orders.push(order);

    localStorage.setItem('orders', JSON.stringify(orders));

    alert('Order submitted: ' + JSON.stringify(order));

    /*
    fetch('submit_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(order)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Order successfully submitted!');
        } else {
            alert('Error submitting order: ' + data.error);
        }
    })
    .catch(error => console.error('Error submitting order:', error));
    */

    clearOrderList();

    // window.location.href = 'displayOrder.html';
}

function clearOrderList() {
    const orderItemsContainer = document.getElementById('order-items');
    while (orderItemsContainer.firstChild) {
        orderItemsContainer.removeChild(orderItemsContainer.firstChild);
    }
}
