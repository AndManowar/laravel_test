<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setRoutes(
    unserialize(base64_decode('TzozNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlQ29sbGVjdGlvbiI6NDp7czo5OiIAKgByb3V0ZXMiO2E6Mzp7czozOiJHRVQiO2E6OTp7czoxOToicG9zdC9nZXQtY2F0ZWdvcmllcyI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6MTk6InBvc3QvZ2V0LWNhdGVnb3JpZXMiO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo2OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo0OToiQXBwXEh0dHBcQ29udHJvbGxlcnNcUG9zdENvbnRyb2xsZXJAZ2V0Q2F0ZWdvcmllcyI7czoxMDoiY29udHJvbGxlciI7czo0OToiQXBwXEh0dHBcQ29udHJvbGxlcnNcUG9zdENvbnRyb2xsZXJAZ2V0Q2F0ZWdvcmllcyI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6Mjk1OnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6MjA6Ii9wb3N0L2dldC1jYXRlZ29yaWVzIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjI4OiIjXi9wb3N0L2dldFwtY2F0ZWdvcmllcyQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToxOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoyMDoiL3Bvc3QvZ2V0LWNhdGVnb3JpZXMiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjMwOiJhamF4L2FkZGl0aW9uYWwtaGFuZGJvb2stZmllbGQiO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjMwOiJhamF4L2FkZGl0aW9uYWwtaGFuZGJvb2stZmllbGQiO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo3OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo1OToiQXBwXEh0dHBcQ29udHJvbGxlcnNcQWpheENvbnRyb2xsZXJAYWRkaXRpb25hbEhhbmRib29rRmllbGQiO3M6MTA6ImNvbnRyb2xsZXIiO3M6NTk6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEFqYXhDb250cm9sbGVyQGFkZGl0aW9uYWxIYW5kYm9va0ZpZWxkIjtzOjk6Im5hbWVzcGFjZSI7czoyMDoiQXBwXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtzOjU6Ii9hamF4IjtzOjU6IndoZXJlIjthOjA6e31zOjI6ImFzIjtzOjMwOiJhamF4LmFkZGl0aW9uYWwtaGFuZGJvb2stZmllbGQiO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjozMjk6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czozMToiL2FqYXgvYWRkaXRpb25hbC1oYW5kYm9vay1maWVsZCI7czoxMDoicGF0aF9yZWdleCI7czo0MDoiI14vYWpheC9hZGRpdGlvbmFsXC1oYW5kYm9va1wtZmllbGQkI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6MTp7aTowO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6MzE6Ii9hamF4L2FkZGl0aW9uYWwtaGFuZGJvb2stZmllbGQiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjIzOiJhamF4L2FkZC1uZXctZGF0YS1maWVsZCI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6MjM6ImFqYXgvYWRkLW5ldy1kYXRhLWZpZWxkIjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NTE6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEFqYXhDb250cm9sbGVyQGFkZE5ld0RhdGFGaWVsZCI7czoxMDoiY29udHJvbGxlciI7czo1MToiQXBwXEh0dHBcQ29udHJvbGxlcnNcQWpheENvbnRyb2xsZXJAYWRkTmV3RGF0YUZpZWxkIjtzOjk6Im5hbWVzcGFjZSI7czoyMDoiQXBwXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtzOjU6Ii9hamF4IjtzOjU6IndoZXJlIjthOjA6e31zOjI6ImFzIjtzOjIzOiJhamF4LmFkZC1uZXctZGF0YS1maWVsZCI7fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjMwOTp7YTo4OntzOjQ6InZhcnMiO2E6MDp7fXM6MTE6InBhdGhfcHJlZml4IjtzOjI0OiIvYWpheC9hZGQtbmV3LWRhdGEtZmllbGQiO3M6MTA6InBhdGhfcmVnZXgiO3M6MzQ6IiNeL2FqYXgvYWRkXC1uZXdcLWRhdGFcLWZpZWxkJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjI0OiIvYWpheC9hZGQtbmV3LWRhdGEtZmllbGQiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjE1OiJhZG1pbi9kYXNoYm9hcmQiO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjE1OiJhZG1pbi9kYXNoYm9hcmQiO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo3OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo1MToiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcTWFpbnBhZ2VDb250cm9sbGVyQGluZGV4IjtzOjEwOiJjb250cm9sbGVyIjtzOjUxOiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVyc1xNYWlucGFnZUNvbnRyb2xsZXJAaW5kZXgiO3M6OToibmFtZXNwYWNlIjtzOjI2OiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO3M6NToiYWRtaW4iO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjI4Mjp7YTo4OntzOjQ6InZhcnMiO2E6MDp7fXM6MTE6InBhdGhfcHJlZml4IjtzOjE2OiIvYWRtaW4vZGFzaGJvYXJkIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjIzOiIjXi9hZG1pbi9kYXNoYm9hcmQkI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6MTp7aTowO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6MTY6Ii9hZG1pbi9kYXNoYm9hcmQiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjE0OiJhZG1pbi9oYW5kYm9vayI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6MTQ6ImFkbWluL2hhbmRib29rIjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NTE6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBpbmRleCI7czoxMDoiY29udHJvbGxlciI7czo1MToiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQGluZGV4IjtzOjk6Im5hbWVzcGFjZSI7czoyNjoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtzOjE0OiJhZG1pbi9oYW5kYm9vayI7czo1OiJ3aGVyZSI7YTowOnt9czoyOiJhcyI7czoxNDoiYWRtaW4uaGFuZGJvb2siO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjoyNzk6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czoxNToiL2FkbWluL2hhbmRib29rIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjIyOiIjXi9hZG1pbi9oYW5kYm9vayQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToxOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoxNToiL2FkbWluL2hhbmRib29rIjt9fXM6OToicGF0aF92YXJzIjthOjA6e31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czoyODoiYWRtaW4vaGFuZGJvb2svcmVmcmVzaC1jYWNoZSI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6Mjg6ImFkbWluL2hhbmRib29rL3JlZnJlc2gtY2FjaGUiO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo3OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo1ODoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQHJlZnJlc2hDYWNoZSI7czoxMDoiY29udHJvbGxlciI7czo1ODoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQHJlZnJlc2hDYWNoZSI7czo5OiJuYW1lc3BhY2UiO3M6MjY6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7czoxNDoiYWRtaW4vaGFuZGJvb2siO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6Mjg6ImFkbWluLmhhbmRib29rLnJlZnJlc2gtY2FjaGUiO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjozMjI6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czoyOToiL2FkbWluL2hhbmRib29rL3JlZnJlc2gtY2FjaGUiO3M6MTA6InBhdGhfcmVnZXgiO3M6Mzc6IiNeL2FkbWluL2hhbmRib29rL3JlZnJlc2hcLWNhY2hlJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjI5OiIvYWRtaW4vaGFuZGJvb2svcmVmcmVzaC1jYWNoZSI7fX1zOjk6InBhdGhfdmFycyI7YTowOnt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6MjU6ImFkbWluL2hhbmRib29rL2Zvcm0ve2lkP30iO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjI1OiJhZG1pbi9oYW5kYm9vay9mb3JtL3tpZD99IjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NTA6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBmb3JtIjtzOjEwOiJjb250cm9sbGVyIjtzOjUwOiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVyc1xIYW5kYm9va0NvbnRyb2xsZXJAZm9ybSI7czo5OiJuYW1lc3BhY2UiO3M6MjY6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7czoxNDoiYWRtaW4vaGFuZGJvb2siO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6MTk6ImFkbWluLmhhbmRib29rLmZvcm0iO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjo0MTk6e2E6ODp7czo0OiJ2YXJzIjthOjE6e2k6MDtzOjI6ImlkIjt9czoxMToicGF0aF9wcmVmaXgiO3M6MjA6Ii9hZG1pbi9oYW5kYm9vay9mb3JtIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjQ3OiIjXi9hZG1pbi9oYW5kYm9vay9mb3JtKD86Lyg/UDxpZD5bXi9dKyspKT8kI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6Mjp7aTowO2E6NTp7aTowO3M6ODoidmFyaWFibGUiO2k6MTtzOjE6Ii8iO2k6MjtzOjY6IlteL10rKyI7aTozO3M6MjoiaWQiO2k6NDtiOjE7fWk6MTthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjIwOiIvYWRtaW4vaGFuZGJvb2svZm9ybSI7fX1zOjk6InBhdGhfdmFycyI7YToxOntpOjA7czoyOiJpZCI7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjI2OiJhZG1pbi9oYW5kYm9vay9kZWxldGUve2lkfSI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6MjY6ImFkbWluL2hhbmRib29rL2RlbGV0ZS97aWR9IjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NTI6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBkZWxldGUiO3M6MTA6ImNvbnRyb2xsZXIiO3M6NTI6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBkZWxldGUiO3M6OToibmFtZXNwYWNlIjtzOjI2OiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO3M6MTQ6ImFkbWluL2hhbmRib29rIjtzOjU6IndoZXJlIjthOjA6e31zOjI6ImFzIjtzOjIxOiJhZG1pbi5oYW5kYm9vay5kZWxldGUiO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjo0MjA6e2E6ODp7czo0OiJ2YXJzIjthOjE6e2k6MDtzOjI6ImlkIjt9czoxMToicGF0aF9wcmVmaXgiO3M6MjI6Ii9hZG1pbi9oYW5kYm9vay9kZWxldGUiO3M6MTA6InBhdGhfcmVnZXgiO3M6NDQ6IiNeL2FkbWluL2hhbmRib29rL2RlbGV0ZS8oP1A8aWQ+W14vXSsrKSQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToyOntpOjA7YTo1OntpOjA7czo4OiJ2YXJpYWJsZSI7aToxO3M6MToiLyI7aToyO3M6NjoiW14vXSsrIjtpOjM7czoyOiJpZCI7aTo0O2I6MTt9aToxO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6MjI6Ii9hZG1pbi9oYW5kYm9vay9kZWxldGUiO319czo5OiJwYXRoX3ZhcnMiO2E6MTp7aTowO3M6MjoiaWQiO31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czoyODoiYWRtaW4vaGFuZGJvb2svYWRkLWRhdGEve2lkfSI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6Mjg6ImFkbWluL2hhbmRib29rL2FkZC1kYXRhL3tpZH0iO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo3OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo1MzoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQGFkZERhdGEiO3M6MTA6ImNvbnRyb2xsZXIiO3M6NTM6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBhZGREYXRhIjtzOjk6Im5hbWVzcGFjZSI7czoyNjoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtzOjE0OiJhZG1pbi9oYW5kYm9vayI7czo1OiJ3aGVyZSI7YTowOnt9czoyOiJhcyI7czoyMzoiYWRtaW4uaGFuZGJvb2suYWRkLWRhdGEiO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjo0Mjc6e2E6ODp7czo0OiJ2YXJzIjthOjE6e2k6MDtzOjI6ImlkIjt9czoxMToicGF0aF9wcmVmaXgiO3M6MjQ6Ii9hZG1pbi9oYW5kYm9vay9hZGQtZGF0YSI7czoxMDoicGF0aF9yZWdleCI7czo0NzoiI14vYWRtaW4vaGFuZGJvb2svYWRkXC1kYXRhLyg/UDxpZD5bXi9dKyspJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjI6e2k6MDthOjU6e2k6MDtzOjg6InZhcmlhYmxlIjtpOjE7czoxOiIvIjtpOjI7czo2OiJbXi9dKysiO2k6MztzOjI6ImlkIjtpOjQ7YjoxO31pOjE7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoyNDoiL2FkbWluL2hhbmRib29rL2FkZC1kYXRhIjt9fXM6OToicGF0aF92YXJzIjthOjE6e2k6MDtzOjI6ImlkIjt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fX1zOjQ6IkhFQUQiO2E6OTp7czoxOToicG9zdC9nZXQtY2F0ZWdvcmllcyI7cjo0O3M6MzA6ImFqYXgvYWRkaXRpb25hbC1oYW5kYm9vay1maWVsZCI7cjozNztzOjIzOiJhamF4L2FkZC1uZXctZGF0YS1maWVsZCI7cjo3MTtzOjE1OiJhZG1pbi9kYXNoYm9hcmQiO3I6MTA1O3M6MTQ6ImFkbWluL2hhbmRib29rIjtyOjEzOTtzOjI4OiJhZG1pbi9oYW5kYm9vay9yZWZyZXNoLWNhY2hlIjtyOjE3MztzOjI1OiJhZG1pbi9oYW5kYm9vay9mb3JtL3tpZD99IjtyOjIwNztzOjI2OiJhZG1pbi9oYW5kYm9vay9kZWxldGUve2lkfSI7cjoyNDk7czoyODoiYWRtaW4vaGFuZGJvb2svYWRkLWRhdGEve2lkfSI7cjoyOTE7fXM6NDoiUE9TVCI7YTozOntzOjIxOiJhZG1pbi9oYW5kYm9vay9jcmVhdGUiO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjIxOiJhZG1pbi9oYW5kYm9vay9jcmVhdGUiO3M6NzoibWV0aG9kcyI7YToxOntpOjA7czo0OiJQT1NUIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NTI6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBjcmVhdGUiO3M6MTA6ImNvbnRyb2xsZXIiO3M6NTI6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBjcmVhdGUiO3M6OToibmFtZXNwYWNlIjtzOjI2OiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO3M6MTQ6ImFkbWluL2hhbmRib29rIjtzOjU6IndoZXJlIjthOjA6e31zOjI6ImFzIjtzOjIxOiJhZG1pbi5oYW5kYm9vay5jcmVhdGUiO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjozMDA6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czoyMjoiL2FkbWluL2hhbmRib29rL2NyZWF0ZSI7czoxMDoicGF0aF9yZWdleCI7czoyOToiI14vYWRtaW4vaGFuZGJvb2svY3JlYXRlJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjIyOiIvYWRtaW4vaGFuZGJvb2svY3JlYXRlIjt9fXM6OToicGF0aF92YXJzIjthOjA6e31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czoyNjoiYWRtaW4vaGFuZGJvb2svdXBkYXRlL3tpZH0iO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjI2OiJhZG1pbi9oYW5kYm9vay91cGRhdGUve2lkfSI7czo3OiJtZXRob2RzIjthOjE6e2k6MDtzOjQ6IlBPU1QiO31zOjY6ImFjdGlvbiI7YTo3OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo1MjoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQHVwZGF0ZSI7czoxMDoiY29udHJvbGxlciI7czo1MjoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQHVwZGF0ZSI7czo5OiJuYW1lc3BhY2UiO3M6MjY6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7czoxNDoiYWRtaW4vaGFuZGJvb2siO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6MjE6ImFkbWluLmhhbmRib29rLnVwZGF0ZSI7fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjQyMDp7YTo4OntzOjQ6InZhcnMiO2E6MTp7aTowO3M6MjoiaWQiO31zOjExOiJwYXRoX3ByZWZpeCI7czoyMjoiL2FkbWluL2hhbmRib29rL3VwZGF0ZSI7czoxMDoicGF0aF9yZWdleCI7czo0NDoiI14vYWRtaW4vaGFuZGJvb2svdXBkYXRlLyg/UDxpZD5bXi9dKyspJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjI6e2k6MDthOjU6e2k6MDtzOjg6InZhcmlhYmxlIjtpOjE7czoxOiIvIjtpOjI7czo2OiJbXi9dKysiO2k6MztzOjI6ImlkIjtpOjQ7YjoxO31pOjE7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoyMjoiL2FkbWluL2hhbmRib29rL3VwZGF0ZSI7fX1zOjk6InBhdGhfdmFycyI7YToxOntpOjA7czoyOiJpZCI7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjI5OiJhZG1pbi9oYW5kYm9vay9zYXZlLWRhdGEve2lkfSI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6Mjk6ImFkbWluL2hhbmRib29rL3NhdmUtZGF0YS97aWR9IjtzOjc6Im1ldGhvZHMiO2E6MTp7aTowO3M6NDoiUE9TVCI7fXM6NjoiYWN0aW9uIjthOjc6e3M6MTA6Im1pZGRsZXdhcmUiO2E6MTp7aTowO3M6Mzoid2ViIjt9czo0OiJ1c2VzIjtzOjU0OiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVyc1xIYW5kYm9va0NvbnRyb2xsZXJAc2F2ZURhdGEiO3M6MTA6ImNvbnRyb2xsZXIiO3M6NTQ6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBzYXZlRGF0YSI7czo5OiJuYW1lc3BhY2UiO3M6MjY6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7czoxNDoiYWRtaW4vaGFuZGJvb2siO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6MjQ6ImFkbWluLmhhbmRib29rLnNhdmUtZGF0YSI7fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjQzMDp7YTo4OntzOjQ6InZhcnMiO2E6MTp7aTowO3M6MjoiaWQiO31zOjExOiJwYXRoX3ByZWZpeCI7czoyNToiL2FkbWluL2hhbmRib29rL3NhdmUtZGF0YSI7czoxMDoicGF0aF9yZWdleCI7czo0ODoiI14vYWRtaW4vaGFuZGJvb2svc2F2ZVwtZGF0YS8oP1A8aWQ+W14vXSsrKSQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToyOntpOjA7YTo1OntpOjA7czo4OiJ2YXJpYWJsZSI7aToxO3M6MToiLyI7aToyO3M6NjoiW14vXSsrIjtpOjM7czoyOiJpZCI7aTo0O2I6MTt9aToxO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6MjU6Ii9hZG1pbi9oYW5kYm9vay9zYXZlLWRhdGEiO319czo5OiJwYXRoX3ZhcnMiO2E6MTp7aTowO3M6MjoiaWQiO31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19fX1zOjEyOiIAKgBhbGxSb3V0ZXMiO2E6MTI6e3M6MjM6IkhFQURwb3N0L2dldC1jYXRlZ29yaWVzIjtyOjQ7czozNDoiSEVBRGFqYXgvYWRkaXRpb25hbC1oYW5kYm9vay1maWVsZCI7cjozNztzOjI3OiJIRUFEYWpheC9hZGQtbmV3LWRhdGEtZmllbGQiO3I6NzE7czoxOToiSEVBRGFkbWluL2Rhc2hib2FyZCI7cjoxMDU7czoxODoiSEVBRGFkbWluL2hhbmRib29rIjtyOjEzOTtzOjMyOiJIRUFEYWRtaW4vaGFuZGJvb2svcmVmcmVzaC1jYWNoZSI7cjoxNzM7czoyNToiUE9TVGFkbWluL2hhbmRib29rL2NyZWF0ZSI7cjozNDQ7czozMDoiUE9TVGFkbWluL2hhbmRib29rL3VwZGF0ZS97aWR9IjtyOjM3NztzOjI5OiJIRUFEYWRtaW4vaGFuZGJvb2svZm9ybS97aWQ/fSI7cjoyMDc7czozMDoiSEVBRGFkbWluL2hhbmRib29rL2RlbGV0ZS97aWR9IjtyOjI0OTtzOjMyOiJIRUFEYWRtaW4vaGFuZGJvb2svYWRkLWRhdGEve2lkfSI7cjoyOTE7czozMzoiUE9TVGFkbWluL2hhbmRib29rL3NhdmUtZGF0YS97aWR9IjtyOjQxODt9czoxMToiACoAbmFtZUxpc3QiO2E6MTE6e3M6MzA6ImFqYXguYWRkaXRpb25hbC1oYW5kYm9vay1maWVsZCI7cjozNztzOjIzOiJhamF4LmFkZC1uZXctZGF0YS1maWVsZCI7cjo3MTtzOjE1OiJhZG1pbi5kYXNoYm9hcmQiO3I6MTA1O3M6MTQ6ImFkbWluLmhhbmRib29rIjtyOjEzOTtzOjI4OiJhZG1pbi5oYW5kYm9vay5yZWZyZXNoLWNhY2hlIjtyOjE3MztzOjIxOiJhZG1pbi5oYW5kYm9vay5jcmVhdGUiO3I6MzQ0O3M6MjE6ImFkbWluLmhhbmRib29rLnVwZGF0ZSI7cjozNzc7czoxOToiYWRtaW4uaGFuZGJvb2suZm9ybSI7cjoyMDc7czoyMToiYWRtaW4uaGFuZGJvb2suZGVsZXRlIjtyOjI0OTtzOjIzOiJhZG1pbi5oYW5kYm9vay5hZGQtZGF0YSI7cjoyOTE7czoyNDoiYWRtaW4uaGFuZGJvb2suc2F2ZS1kYXRhIjtyOjQxODt9czoxMzoiACoAYWN0aW9uTGlzdCI7YToxMjp7czo0OToiQXBwXEh0dHBcQ29udHJvbGxlcnNcUG9zdENvbnRyb2xsZXJAZ2V0Q2F0ZWdvcmllcyI7cjo0O3M6NTk6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEFqYXhDb250cm9sbGVyQGFkZGl0aW9uYWxIYW5kYm9va0ZpZWxkIjtyOjM3O3M6NTE6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEFqYXhDb250cm9sbGVyQGFkZE5ld0RhdGFGaWVsZCI7cjo3MTtzOjUxOiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVyc1xNYWlucGFnZUNvbnRyb2xsZXJAaW5kZXgiO3I6MTA1O3M6NTE6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBpbmRleCI7cjoxMzk7czo1ODoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQHJlZnJlc2hDYWNoZSI7cjoxNzM7czo1MjoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQGNyZWF0ZSI7cjozNDQ7czo1MjoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQHVwZGF0ZSI7cjozNzc7czo1MDoiQXBwXEFkbWluXEh0dHBcQ29udHJvbGxlcnNcSGFuZGJvb2tDb250cm9sbGVyQGZvcm0iO3I6MjA3O3M6NTI6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBkZWxldGUiO3I6MjQ5O3M6NTM6IkFwcFxBZG1pblxIdHRwXENvbnRyb2xsZXJzXEhhbmRib29rQ29udHJvbGxlckBhZGREYXRhIjtyOjI5MTtzOjU0OiJBcHBcQWRtaW5cSHR0cFxDb250cm9sbGVyc1xIYW5kYm9va0NvbnRyb2xsZXJAc2F2ZURhdGEiO3I6NDE4O319'))
);
