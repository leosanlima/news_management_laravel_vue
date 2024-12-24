// Date formatting options
const DATE_FORMAT_OPTIONS = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  };
  
  /**
   * Format a date string into a readable format
   * @param {string|Date|null} date - Date to format
   * @returns {string} Formatted date string or empty string if invalid
   */
  export const formatDate = (date) => {
    if (!date) return '';
    
    try {
      const dateObj = new Date(date);
      if (isNaN(dateObj.getTime())) return '';
      
      // Use `pt-BR` for Brazilian Portuguese
      return dateObj.toLocaleDateString('pt-BR', DATE_FORMAT_OPTIONS);
    } catch {
      return '';
    }
  };
  
  /**
   * Truncate text to a specified length with ellipsis
   * @param {string} text - Text to truncate
   * @param {number} length - Maximum length
   * @returns {string} Truncated text with ellipsis or original if shorter
   */
  export const truncate = (text = '', length = 100) => {
    if (!text || typeof text !== 'string') return '';
    if (text.length <= length) return text;
    
    return text.slice(0, length).trim() + '...';
  };
  