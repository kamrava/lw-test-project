const routes = []

/* ------------- Import module routes here -------------- */
import dashboard_routes from 'src/modules/dashboard/routes'
import server_routes from 'src/modules/server/routes'

routes.push(...dashboard_routes)
routes.push(...server_routes)

  // Always leave this as last one,
  // but you can also remove it
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '/:catchAll(.*)*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
