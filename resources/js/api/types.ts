export interface Category {
  id: number;
  name: string;
  created_at: string;
  updated_at: string;
}

export interface News {
  id: number;
  title: string;
  content: string;
  category_id: number;
  category: Category;
  created_at: string;
  updated_at: string;
}

export interface PaginatedResponse<T> {
  data: T[];
  current_page: number;
  last_page: number;
  per_page: number;
  total: number;
}
