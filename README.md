# PHP 프로젝트
공공데이터 포털에서 제공하는 API를 호출하여 대구 전시·공연 정보 제공 웹 서비스

## 개발환경
- OS : Windows10   
- Server : Ubuntu   
- Server Tool : vmware
- Language : PHP   
- Edit Tool : VSC   
- DB : Mysql   
   
## 기능 설명
-----
#### [회원가입/로그인 기능]
-----
    회원가입 : DB에 insert into 쿼리를 이용하여 데이터 입력
    로그인 : DB에 select 쿼리를 이용하여 데이터 조회
----
#### [전시, 공연 정보 날짜별 검색 기능]
----
    공공데이터포털 API를 호출하여 파싱 후 데이터 출력
----
#### [전시, 공연 리뷰 및 별점 작성 기능]
----
    request 데이터를 DB에 insert into 쿼리를 이용하여 데이터 입력
----
#### [sns와 같이 좋아요 기능]
----
    DB에 게시글 번호랑 좋아요 저장 후 조회
