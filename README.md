# Magento 2 Share Cart extension by Ecomteck

[Ecomteck Share Cart Extension](https://www.ecomteck.com/download/magento-2-share-cart/) helps customers in sharing their shopping cart with friends and family as well. This is a supportive method to promote store’s conversion rate via the existing users, and this can significantly contribute to the revenue of the store.

- Share shopping cart quickly 
- Shortly review purchasing cart
- Download the PDF file with full information


## 1. Documentation

- [Installation guide](https://www.ecomteck.com/install-magento-2-extension/)
- [Introduction page](http://www.ecomteck.com/download/magento-2-share-cart/)
- [Contribute on Github](https://github.com/ecomteck/module-share-cart)
- [Get Support](https://github.com/ecomteck/module-share-cart/issues)

## 2. FAQs

## 3. How to install Share Cart extension for Magento 2

- Install via composer (recommend)

Run the following command in Magento 2 root folder:

```
composer require ecomteck/module-share-cart
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```

## 4. Highlight Features

### Quick share by copy-and-paste 

**Share Cart Extension** allows the store owners to add an extra button which is **Share Cart** while a customer is processing their purchasing.

The button can be displayed in the **Minicart** section and **Shopping Cart Page**. By clicking this button, the customer can copy their shopping cart’ s URL and paste to a destination just in the blink of an eye. When the URL recipient clicks on the shared URL, their current shopping cart will be automatically added with the same items.

### A brief summary with Text button 

For the cart which contains a large number of items, **Share Cart** module allows the customers to view a shot summary easily with **Text** - another extra button.

When the customer hit the **Text** button on their **Shopping Cart Page**, a pop-up text can be seen, it appears as a purchase summarizing box.
This little simple button supports customers in taking a clear overview of chosen items with necessary information such as items’ name, price, quantity and the cart total.

### Quick Shopping cart PDF file publishing

**PDF** button is another extra button with the function to download. When the customer hits this button, a PDF file will be downloaded and stored automatically in the user's current device. In comparison to the **Text** button with quick view function, **PDF**'s function allows the customer to get detail information such as:
- Information of store: Company Name, Address, Email, Phone, VAT Information, Registered Number, and Warning Message
- Date of the purchase
- Purchase summary: Quantity, Price, Total, Stock ID, Descriptio


## 5. More features

### Update function 

**Update** button is for updating the shopping cart with the latest changes from the original cart. 

### Warning message offering

Admin is able to add a message to the PDF file, as a notice to customers (for instance, informing about the validation of the file downloaded). 

### Mobile responsive ability

The module is properly responsive with both mobile and desktop devices.

## 6. Full Features List

### For store owners
- Enable/ Disable the module
- Enable/disable the extension
- Be able to set the PDF file name
- Add the timestamp suffix which shows the PDF file downloaded time
- Add information of the store including Company name, Address, Phone, Email, VAT Number, Registered Number
- Display a warning message to notify customers in the PDF file 

### For customers
- Quickly and easily share the shopping cart
- Briefly view the shared shopping cart
- Download and store the PDF with adequate information

## 7. How to configure Share Cart in Magento 2

### 7.1 Configuration

- Access to your Magento 2 Admin Panel, navigate to `Store tab > Open Settings > Configuration `
- Click `Ecomteck > Share Cart > Configuration`, go to `General Configuration` section.


#### 7.1.1. General

- **Enable**: Choose `Yes` to enable the Module. If the module is turned on, all the features work well. Otherwise, all the options in admin panel and the module will not show. 
- **Enable**: Select `Yes` to enable the extension
- **File Name**: Insert name for PDF file. The PDF file will display the customer’s order information
- **Add Timestamp suffix**: Click `Yes` option to display the current time to upload PDF document
 
#### 7.1.2. Business Information

- **Company Name**: Insert your company name in this field
- **Address**: Fill the company’s location
- **VAT Number**: Provide information about Value Added Taxes number
- **Registered Number**: Insert your company registered number
- **Phone**: Insert phone number
- **Email**: Another needed contact detail is the email address
- **Warning Message**: This field is for the special content you want to notice in the PDF orders. For instance: Prices are correct at the time of generation, some possibly have been changed since.


### 7.2 Frontend

After activating the module, customers can use **Share Cart** button to deliver the URL to people which they want to share the cart. After sharing, there will be already-added items in the cart of the URL recipient. 

- **Share Cart** button displays in the **Minicart** section when adding items to cart.



- Display play **Share Cart** button on **Shopping Cart** page, customers can click this button to share the cart URL.


  - Customers can click **Update Shopping Cart** to re-update information and changes in the original cart.
  - Click **Text** button to see detail information about products and price.
  
  
  - Click on **PDF** button to see the order information.
    
    **PDF library setting instruction**
    
You need to delete the generated file and run the following command:

`
composer require mpdf/mpdf
`

