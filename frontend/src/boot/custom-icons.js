export default ({ app }) => {
  const myIcons = {
    'flag-usa': 'img:statics/flags/united states.svg',
    'flag-turkey': 'img:statics/flags/turkey.svg',
    'flag-spain': 'img:statics/flags/spain.svg',
    'flag-germany': 'img:statics/flags/germany.svg',
    'flag-china': 'img:statics/flags/china.svg',
    'flag-france': 'img:statics/flags/france.svg',
    'flag-japan': 'img:statics/flags/japan.svg',
    'flag-portuguese': 'img:statics/flags/brazil.svg',
    'flag-netherlands': 'img:statics/flags/netherlands.svg',
  }

  app.config.globalProperties.$q.iconMapFn = (iconName) => {
    const icon = myIcons[iconName]
    if (icon !== void 0) {
      return { icon: icon }
    }
  }
}
