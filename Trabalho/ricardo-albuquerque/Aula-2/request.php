<?php 
	class Request {
		
		private $method;
		private $status;
		private $host;
		private $contentType;
		private $category;
		private $absoluteSize;
		private $transferSize;
		private $path;
		private $queryString;
		
		public function __construct($method, $status, $host, $contentType, $category, $absoluteSize, $transferSize, $path, $queryString)	{
			$this->$method = $method;
			$this->$status = $status;
			$this->$host = $host;
			$this->$contentType = $contentType;
			$this->$category = $category;
			$this->$absoluteSize = $absoluteSize;
			$this->$transferSize = $transferSize;
			$this->$path = $path;
			$this->$queryString = $queryString;
		}
		public function setMethod($arg){
			$method = $arg;
		}
		public function setStatus($arg){
			$status = $arg;
		}
		public function setHost($arg){
			$host = $arg;
		}
		public function setContentType($arg){
			$contentType = $arg;
		}	
		public function setCategory($arg){
			$category = $arg;
		}
		public function setAbsoluteSize($arg){
			$absoluteSize = $arg;
		}
		public function setTransferSize($arg){
			$transferSize = $arg;
		}
		public function setPath($arg){
			$path = $arg;
		}
		public function setQueryString($arg){
			$queryString = $arg;
		}
		public function getMethod(){
			return $method;
	        }		
	        public function getStatus(){
			return $status;
                }
                public function getHost(){
			return $host;
                }
                public function getContentType(){
			return $contentType;
                }	
                public function getCategory(){
			return $category;
                }
                public function getAbsoluteSize(){
			return $absoluteSize;
                }
                public function getTransferSize(){
			return $transferSize;
                }
                public function getPath(){
			return $path;
                }
                public function getQueryString(){
			return $queryString;
                }
		
       }
