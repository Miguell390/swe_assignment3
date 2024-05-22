// document.addEventListener('DOMContentLoaded', () => {
//     const orderList = document.getElementById('order-list');
//     const storedOrder = localStorage.getItem('order');

//     if (storedOrder) {
//         const order = JSON.parse(storedOrder);

//         order.forEach(item => {
//             const listItem = document.createElement('li');
//             listItem.innerHTML = `Item ID: ${item.id}, Quantity: ${item.quantity}, Item name: ${item.menuName}`;
//             orderList.appendChild(listItem);
//         });
//     } else {
//         const noOrderMessage = document.createElement('li');
//         noOrderMessage.textContent = 'No order found.';
//         orderList.appendChild(noOrderMessage);
//     }
// });


// document.addEventListener('DOMContentLoaded', () => {
//     const ordersList = document.getElementById('orders-list');
//     const storedOrders = JSON.parse(localStorage.getItem('orders')) || [];

//     if (storedOrders.length === 0) {
//         const noOrdersMessage = document.createElement('li');
//         noOrdersMessage.textContent = 'No orders found.';
//         ordersList.appendChild(noOrdersMessage);
//     } else {
//         storedOrders.forEach((order, index) => {
//             const orderItem = document.createElement('li');
//             orderItem.innerHTML = `<strong>Order ${index + 1}:</strong>`;

//             const orderDetails = document.createElement('ul');
//             order.forEach(item => {
//                 const itemDetail = document.createElement('li');
//                 itemDetail.textContent = `Item ID: ${item.id}, Quantity: ${item.quantity}, Item name: ${item.menuName}`;
//                 orderDetails.appendChild(itemDetail);
//             });

//             orderItem.appendChild(orderDetails);
//             ordersList.appendChild(orderItem);
//         });
//     }
// });


document.addEventListener('DOMContentLoaded', () => {
    const ordersList = document.getElementById('orders-list');
    let storedOrders = JSON.parse(localStorage.getItem('orders')) || [];

    function displayOrders() {
        ordersList.innerHTML = ''; // Clear the list before displaying

        if (storedOrders.length === 0) {
            const noOrdersMessage = document.createElement('li');
            noOrdersMessage.textContent = 'No orders found.';
            ordersList.appendChild(noOrdersMessage);
        } else {
            storedOrders.forEach((order, index) => {
                const orderItem = document.createElement('li');
                orderItem.innerHTML = `<strong>Order ${index + 1}:</strong>`;
                
                const orderDetails = document.createElement('ul');
                order.forEach(item => {
                    const itemDetail = document.createElement('li');
                    itemDetail.textContent = `Item ID: ${item.id}, Quantity: ${item.quantity}, Item name: ${item.menuName}`;
                    orderDetails.appendChild(itemDetail);
                });

                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete Order';

                deleteButton.classList.add('delete-button'); //added a class for red button

                deleteButton.onclick = () => deleteOrder(index);

                orderItem.appendChild(orderDetails);
                orderItem.appendChild(deleteButton);
                ordersList.appendChild(orderItem);
            });
        }
    }

    function deleteOrder(orderIndex) {
        storedOrders.splice(orderIndex, 1);
        localStorage.setItem('orders', JSON.stringify(storedOrders));
        displayOrders();
    }

    function checkForNewOrders() {
        const currentOrders = JSON.parse(localStorage.getItem('orders')) || [];
        if (currentOrders.length !== storedOrders.length) {
            storedOrders = currentOrders;
            displayOrders();
        }
    }

    displayOrders();

    setInterval(checkForNewOrders, 10000);
});
