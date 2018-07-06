let CART_LOCAL_STORAGE_KEY = "CART_LOCAL_STORAGE_KEY"

const getLocalCartData = () => {
  const localCartData = localStorage.getItem(CART_LOCAL_STORAGE_KEY);
  if(!localCartData) {
    return null;
  }

  try {
    return JSON.parse(localCartData)
  } catch (error) {
    localStorage.removeItem(CART_LOCAL_STORAGE_KEY);
    return null
  }
}

const localCartData = getLocalCartData() || {};

const EventBus = new Vue();