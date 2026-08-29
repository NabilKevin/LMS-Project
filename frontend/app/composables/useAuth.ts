import { useApi } from "./useApi"

export const useAuth = () => {
  
  const login = async (credentials: object) => {
    try {
      const response = await useApi('/login', {
        method: 'POST',
        body: credentials
      })
      return response
    } catch (error) {
      throw error
    }
  }

  const logout = async () => {
    try {
      await useApi('/logout', {
        method: 'POST'
      })

      const token = useCookie('auth_token')
      token.value = null
      navigateTo('/login')
    } catch (error) {
      console.error('Gagal logout', error)
    }
  }

  return { login, logout }
}