export interface Topic {
  id: number;
  topic_name: string;
  topic_order: number;
  is_completed: boolean;
  sub_topic: SubTopic[];
}

export interface SubTopic {
  id: number;
  name: string;
  slug: string;
  order: number;
  content_format: string;
  is_completed: boolean;
}
