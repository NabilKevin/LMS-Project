import type { FetchContext } from 'ofetch'

export const useApi = async (endpoint: string, options: any = {}) => {
  const token = useCookie('auth_token') 

  return await $fetch(endpoint, {
    baseURL: 'http://localhost:8000/api', 
    
    ...options,
    
    headers: {
      Accept: 'application/json',
      Authorization: token.value ? `Bearer ${token.value}` : '',
      ...options.headers,
    },
    
    onResponseError(context: FetchContext) {
      if (context.response?.status === 401) {
        console.error('Sesi habis, silakan login kembali.')
        navigateTo('/login')
      }
    }
  })
}