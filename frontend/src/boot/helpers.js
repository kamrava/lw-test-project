export default async ({ app }) => {
  app.config.globalProperties.$helpers = {
    _isEqual(obj1, obj2) {
      obj1 = Object.fromEntries(Object.entries(obj1).sort());
      obj2 = Object.fromEntries(Object.entries(obj2).sort());

      return JSON.stringify(obj1) === JSON.stringify(obj2);
    },
  };
};
